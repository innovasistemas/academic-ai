name = input('Nombre: ')
age = int(input('Edad: '))
dict = {'Nombre': name, 'Edad': age}
print(dict)
print(f"Su nombre es: {dict['Nombre']}")
print(f"Su edad es: {dict['Edad']}")

for key in dict:
    print(f"Clave: {key}")

for value in dict.values():
	print(f"Valor: {value}")

for key, value in dict.items():
	print(f"Clave: {key} - Valor: {value}")
