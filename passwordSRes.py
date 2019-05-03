import csv

import pandas as pd
#!/usr/bin/python3

import pymysql
import numpy as np
import random



mydb = pymysql.connect(        host="localhost",
                               user="root",
                               passwd="Zaqw1234$#@!",
                               db = "SpaceReservation")

mydb.cursor().execute('DROP TABLE IF EXISTS Logins')

mydb.cursor().execute("CREATE TABLE Logins (email VARCHAR(255), password VARCHAR(255))")

name = "/Users/dchavouzis/Desktop/Keys.csv"
matches = pd.read_csv(name, encoding = "latin")
pd.DataFrame(matches)

print(matches)

for index, row in matches.iterrows():
    
   
   
    
    sql = "INSERT INTO Logins (email, password) VALUES (%s , %s)"
    val = (row["email"], row["password"])
    
    mydb.cursor().execute(sql, val)

mydb.commit()
mydb.cursor().close()
print ("Done")
