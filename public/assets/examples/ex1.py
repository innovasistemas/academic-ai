
"""
Fuente: https://j2logo.com/python/tutorial/
"""

'''
Este comentario aplica para varias líneas
'''

# Primer programa Python

def show_data(datum):
    """ Función para imprimir una variable """
    print(datum)


def sum_array(array_data):
    ''' Función para sumar los datos de una vector de números '''
    s = 0
    for data in array_data:
        s += data
    return s


a = 2
b = 3
s = a + b
show_data(a)
show_data("Valor de a: " + str(a))
show_data("Valor de b: " + str(b))
print("La suma de a y b es: " + str(s)) 

name = "Carlos Coroliano \
Amador Fernández"

print ("Nombre: " + name)
show_data("Nombre con la función: " + name)

list = [3, 4]
print('Lista 1: ')
print(list)
print("Suma datos lista 1: " + str(sum_array(list)))

list2 = [
    10,
    20,
    30,
    40,
    50,
    60,
    70
]
print("Lista 2:")
print(list2)
print("Lista 2 en posición 2: " + str(list2[2]))
print("Suma datos lista 2: " + str(sum_array(list2)))

print("Nombre: ")
name = input()
print("Edad: ")
age = int(input())
print(f'Su nombre es: {name}')
print(f"Su edad es: {age}")
print("Otra forma con formatos")
print("Nombre: %s \nEdad: %d" % (name, age))

if age >= 18:
    message = "Mayor de edad"
else:
    message = "Menor de edad"

print(f"Usted es {message}")

print("Ingrese un número: ")
number = float(input())

if number > 0:
    message = "Número positivo"
    i = 1
    while i <= number:
        print(i)
        i+=1
elif number < 0:
    message = "Número negativo"
else:
    message = "Número igual a 0"

print(f"Dato ingresado {number}: {message}")


json = {'Nombre': name, 'Edad': age}
print(json)

for key in json:
    print(f"Clave: {key}")

for value in json.values():
    print(f"Valor: {value}")

for key, value in json.items():
    print(f"Clave: {key} - Valor: {value}")

print("Clase range()")
for i in range(5):
	print(i)

print("Números pares de 0 a 10")
for i in range(0, 11, 2):
    print(i)










