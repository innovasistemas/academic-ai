#Condicionales anidados
#Leer un número y determinar si es positivo
#negativo o cero

print("Ingrese un número: ")
numero = float(input())
if numero > 0:
    print(f"{numero} es positivo")
    # print("%.3f es mayor que 0" % (numero))
    # print(str(numero) + " es mayor que 0")
elif numero < 0:
    print(f"{numero} negativo")
else: 
    print("El número es 0")
    