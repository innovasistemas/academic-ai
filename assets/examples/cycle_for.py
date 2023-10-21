# Ciclo for
import math

print("Posición inicial: ")
x0 = float(input())
print("Velocidad inicial: ")
v0 = float(input())
print("Aceleración: ")
a = float(input())
print("\033[94mTiempo \t Posición")
for t in range(1, 21, 1):
    x = x0 + v0 * t + 1/2 * a * math.pow(t, 2)
    print(f"{t} \t {x}")