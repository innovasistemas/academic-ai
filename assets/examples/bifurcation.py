# Ejemplo continue
print("Ingrese un texto:", end =" ")
string = input()
for letter in string:
    if letter == "a":
        continue
    print(letter)


# Ejemplo break
c = 0
while True:
    print("Ingrese un nombre (* para terminar):", end =" ")
    name = input()
    if name == "*":
        break
    c+=1
print(f"Total personas: {c}")


# Ejemplo exit()
c = 0
while True:
    print("Ingrese código (* para terminar):", end =" ")
    code = input()
    if code == "*":
        break #exit()
    c+=1
# Observe que la siguiente línea no se ejecuta, a diferencia de break 
# que continúa el flujo del programa luego del ciclo
print(f"Total empleados: {c}")




