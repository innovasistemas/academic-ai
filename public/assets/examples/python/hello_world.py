#Primer programa en Python
print('Hola, bienvenido al lenguaje Python')

'''
Este es un comentario
de varias líneas
'''
# Variables y operadores
print("Ingrese número 1:")
x = float(input())
print("Ingrese número 2:")
y = float(input())
print("Números ingresados")
print("x = %.2f \t y = %.2f" % (x, y))
print("\n\n")
print(f"x = {x} \t y = {y}")
z = x + y
print(f"Suma: {z}")
z = x - y
print(f"Resta: {z}")
z = x * y
print(f"Multiplicación: {z}")

if y != 0:
    z = x / y
    print(f"División: {z}")
    z = x // y
    print(f"División entera: {z}")
    z = x % y
    print(f"División de módulo: {z}")
else:
    print("División: Error, división por 0")
    
if x == 0 and y == 0:   
    print("Potencia: Error, no se puede efectuar")
else:
    z = x ** y
    print(f"Potencia: {z}")





