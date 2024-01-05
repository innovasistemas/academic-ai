import math 

print("Funciones matemáticas")

print("Ingrese número 1: ")
x = float(input())
print("Ingrese número 2: ")
y = float(input())

z = math.pow(x, y)
print(f"Potencia {x} ^ {y}: {z}")

if x >= 0:
    z = math.sqrt(x)
    print(f"Raíz cuadrada {x}: {z}")
else:
    print("No se puede calcular la raíz cuadrada")

z = math.trunc(x)
print(f"Redondeo trunc (0 decimales): {z}")

z = round(x, 1)
print(f"Redondeo round (1 decimal): {z}")

z = math.floor(x)
print(f"Redondeo por debajo: {z}")

z = math.ceil(x)
print(f"Redondeo por encima: {z}")

z = math.sin(y)
print(f"Radianes: sen({y}): {z}")
print(f"Grados: sen({y}): {math.degrees(z)}")

z = math.cos(y)
print(f"Radianes: cos({y}): {z}")
print(f"Grados: cos({y}): {math.degrees(z)}")

