from faker import Factory
import random
import string
import hashlib
fake = Factory.create('fr_FR')


print('PRAGMA synchronous=OFF;')
print('PRAGMA journal_mode=MEMORY;')
print('PRAGMA temp_store=MEMORY;')

for _ in range(51358):
    firstname = fake.first_name()
    lastname = fake.last_name()
    username = firstname[0]+lastname+str(random.randint(100, 900))
    random_password = ''.join([random.choice(string.ascii_letters + string.digits) for n in range(32)])
    hash_password = hashlib.sha1(random_password.encode('utf-8')).hexdigest()
    print("INSERT INTO users VALUES('" + username.lower() + "','" + firstname + "','" + lastname + "','" + hash_password+"');")
