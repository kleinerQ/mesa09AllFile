import  MySQLdb

db = MySQLdb.connect(host = "localhost", user = "root", passwd = "root" , db = "memberList" )
cur = db.cursor()

cur.execute("select token from member")

for token in cur.fetchall():
    if token[0] != 'NULL':
        print(token[0])


db.close()
