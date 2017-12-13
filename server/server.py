from datetime import datetime
from datetime import time
from datetime import date
import mysql.connector
import random
import sys

#import pdf tools
from reportlab.lib.styles import getSampleStyleSheet
from reportlab.lib.pagesizes import letter
from reportlab.platypus import Paragraph, SimpleDocTemplate


class Check:
    def __init__(self, _id, _amount, _date, _letter_date, _company, _status):
        self.id = _id
        self.amount = _amount
        self.date = _date
        self.letter_date = _letter_date
        self.company = _company
        self.status = _status

    def __str__(self, **kwargs):
        str = """
id: = {}
amount = ${}
date = {}
letter_date = {}
company = {}
status = {}"""
        return str.format(self.id,self.amount, self.date, self.letter_date, self.company, self.status)

class Account:
    def __init__(self, id, first, last, street, city, state, zip, number, routing):
        self.id = id;
        self.first = first
        self.last = last
        self.street = street
        self.city = city
        self.state = state
        self.zip = zip
        self.number = number
        self.routing = routing
    def __str__(self):
        str = """
id = {}
first = {}
last = {}
street = {}
city = {}
state = {}
zip = {}
account_number = {}
routing_number = {}"""
        return str.format(self.id, self.first, self.last, self.street, self.city, self.state, self.zip, self.number, self.routing)


class Company:
    def __init__(self, id, name, contact, letter_interval):
        self.id = id
        self.name = name
        self.contact = contact
        self.letter_interval = letter_interval

class Store:
    def __init__(self, id, name, street, city, state, zip):
        self.id = id
        self.name = name
        self.street = street
        self.city = city
        self.state = state
        self.zip = zip
    def __str__(self, **kwargs):
        return "id: {}, name: {}, street: {}, city: {}, state: {}, zip: {}".format(self.id, self.name, self.street, self.city, self.state, self.zip)
class User:
    def __init__(self, id, firstName, lastName, email, role):
        self.id = id
        self.firstName = firstName
        self.lastName = lastName
        self.email = email
        self.role = role


class Server:
    def __init__(self, db_user, db_pass, db_database, db_host):
        self.cnx = mysql.connector.connect(user=db_user, password=db_pass, database=db_database, host=db_host)
        self.time = None

    def run(self):
        while True:
            self.tick()
    def tick(self):
        self.now = datetime.now()
        timeNow = time(hour=self.now.hour, minute=self.now.minute, second=self.now.second)
        if self.time is None or timeNow != self.time:
            self.time = timeNow
            print(self.time)

        if self.time.hour == 0 and self.checked == False:
            self.checkChecks()
        if self.time.hour == 23:
            self.checked = False

    def getStore(self, id):
        cursor = self.cnx.cursor(buffered=True)
        query = "SELECT * from store WHERE store_ID = {} LIMIT 1".format(id)
        cursor.execute(query)
        for (id, name, street, city, state, zipcode, company) in cursor:
            return Store(id, name, street, city, state, zipcode)

    def getCompany(self,id):
        cursor = self.cnx.cursor(buffered=True)
        query = "SELECT * FROM company WHERE company_ID = {} LIMIT 1".format(id)
        cursor.execute(query)
        for (id, name, contact, interval) in cursor:
            return Company(id, name, contact, interval)
    def getManager(self, store):
        cursor = self.cnx.cursor(buffered=True)
        query = "SELECT * FROM `user` WHERE Store_store_ID = {} AND user_role_name = 'manager' LIMIT 1".format(store.id)
        cursor.execute(query)
        for (id, fname, lname, email, password, role, storeid, companyid) in cursor:
            return User(id, fname, lname, email, role)

    def checkChecks(self):
        cursor = self.cnx.cursor(buffered=True)

        query = ("SELECT check_ID, check_ammount, check_date, letter_sent_date, Store_Company_company_ID, letter_status, Account_account_ID, Store_store_ID FROM `check` WHERE payment_received = 0 AND letter_status < 4")
        update = ("UPDATE `check` SET check_date = %s WHERE check_ID = %s")

        cursor.execute(query)

        for (check_ID, check_ammount, check_date, letter_date, company_id, letter_status, account, storeId) in cursor:
             check_date = datetime(year=check_date.year, month=check_date.month, day=check_date.day)
             if letter_date is not None:
                letter_date = datetime(year=letter_date.year, month=letter_date.month, day=letter_date.day)

             check = Check(check_ID, check_ammount, check_date, letter_date, company_id, int(letter_status))
             store = self.getStore(storeId)
             #print(check)
             now = datetime.today()
             #print(now)
             if check.letter_date is not None:
                 diff = now - check.letter_date
                 if abs(diff.days) >= 14:
                     curs2 = self.cnx.cursor(buffered=True)
                     accountQuery = "SELECT account_ID, account_fname, account_lname, account_street, account_city, account_state, account_zip, account_number, account_routing_number, company_ID FROM `account` WHERE account_ID = {}".format(account)
                     curs2.execute(accountQuery)
                     for (acc_ID, acc_first, acc_last, acc_street, acc_city, acc_state, acc_zip, acc_number, acc_routing, acc_company) in curs2:
                         account = Account(acc_ID, acc_first, acc_last, acc_street, acc_city, acc_state, acc_zip, acc_number, acc_routing)

                     self.generateLetter(account, check, self.getCompany(company_id), store, self.getManager(store))
                     #print(check)
                     #print(account)
                     #print(store)
             elif check.letter_date is None and int(check.status) == 0:
                 curs2 = self.cnx.cursor(buffered=True)
                 accountQuery = "SELECT account_ID, account_fname, account_lname, account_street, account_city, account_state, account_zip, account_number, account_routing_number, company_ID FROM `account` WHERE account_ID = {}".format(account)
                 curs2.execute(accountQuery)
                 for (acc_ID, acc_first, acc_last, acc_street, acc_city, acc_state, acc_zip, acc_number, acc_routing, acc_company) in curs2:
                     account = Account(acc_ID, acc_first, acc_last, acc_street, acc_city, acc_state, acc_zip, acc_number, acc_routing)

                 self.generateLetter(account, check, self.getCompany(company_id), store, self.getManager(store))
        self.checked = True

    def generateLetter(self, account, check, company, store, manager):
        letterDate = date(day=datetime.now().day, month=datetime.now().month, year=datetime.now().year)
        letterCurs = self.cnx.cursor(buffered=True)
        letter_num = check.status + 1
        
        #check if a report for this letter already exists in the database
        
        if self.reportExists(check, letter_num):
            return

        letterQuery = "SELECT letter_header, letter_body, letter_footer FROM `letter` WHERE letter_number = {} AND Company_company_ID = {} LIMIT 1".format(letter_num, company.id)
        letterCurs.execute(letterQuery)
        
        styles = getSampleStyleSheet()
        styleN = styles['Normal']
        styleH = styles['Heading1']
        paragraphs = []
        for (header, body, footer) in letterCurs:
            headerLines = header.split('\n')
            for line in headerLines:
                paragraphs.append(Paragraph(line.replace('[COMPANY]', company.name).replace('[COMPANY ADDRESS]', store.street + '\n' + store.city +  ', ' + store.state + ' ' + store.zip).replace('[PHONE NUMBER]', company.contact).replace('[DATE]', str(letterDate)), styleN))
            paragraphs.append(Paragraph('', styleN))
            paragraphs.append(Paragraph(body.replace('[NAME OF CUSTOMER]', account.first + ' ' + account.last).replace('[PRICE]', '$' + str(check.amount)), styleN))
            paragraphs.append(Paragraph('', styleN))
            for line in footer.split('\n'):
                paragraphs.append(Paragraph(line.replace('[NAME OF MANAGER]', manager.firstName + ' ' + manager.lastName), styleN))
        filename = str(check.id) + '_' + str(letterDate) + '.pdf'
        doc = SimpleDocTemplate(filename, pagesize = letter)
        doc.build(paragraphs)
        self.insertReport(check, filename, company, letter_num)

    def reportExists(self, check, letter_num):
        cursor = self.cnx.cursor(buffered=True)
        query = "SELECT report_ID FROM `report` WHERE check_ID = {} AND letter_number = {}".format(check.id, letter_num)
        cursor.execute(query)
        letterFound = False;
        print("checking checkid: {} and letter_num: {}".format(check.id, letter_num))
        for id in cursor:
            print('found ' + str(id))
            letterFound = True;
            break;
        return letterFound
    def insertReport(self, check, filename, company, letter_num):
        cursor = self.cnx.cursor(buffered=True)
        query = "INSERT INTO `report` (report_file, letter_number, report_printed, check_ID, company_ID) VALUES ( '{}',{},{},{},{} )".format(filename, letter_num, 0, check.id, company.id)
        cursor.execute(query)



#cnx = mysql.connector.connect(user="dev", password="devs", database="checkmate-dev", host="localhost")

def main():
    server = Server('dev', 'devs', 'checkmate-dev', 'localhost')
    if len(sys.argv) > 1:
        if sys.argv[1] == '-c' or sys.argv[1] == '--check-database':
            server.checkChecks()
            exit(0)

    print('starting checkmate server...')
    server.run()

if __name__ == "__main__":
    main()
