list1 = []
for i in range(2):
	name = input('Nombre: ')
	age = int(input('Edad: '))
	list1.append({'nombre': name, 'edad': age})
	
print("-----" * 5)
for d in list1:
	print(f"Nombre: {d['nombre']}")
	print(f"Edad: {d['edad']}")

print(list1)
