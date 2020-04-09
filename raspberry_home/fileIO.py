f = open('aaa.txt','w')
f.write('hello world \n')
f.close()

f = open('aaa.txt','r')
for line in f:
    print(line.strip())

f.close()

