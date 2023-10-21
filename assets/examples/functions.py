from os import system

# Ejemplo return y funciones

# Función sum con los parámetro x e y
def sum(x, y):
    return x + y


def substract(x, y):
    return x - y


def multiply(x, y):
    return x * y


def divide(x, y):
    return x / y


def show(message):
    print(message)
  

# Programa principal que llama a la función sum
option = ""
n1 = 0
n2 = 0
while option != "8":
    print("1. Ingresar números")
    print("2. Sumar")
    print("3. Restar")
    print("4. Multiplicar")
    print("5. Dividir")
    print("6. Números actuales")
    print("7. Limpiar pantalla")
    print("8. Terminar")
    print("Ingrese su opción:", end =" ")
    option = input()
    if option == "1":
        print("Ingrese número 1:", end =" ")
        n1 = int(input())
        print("Ingrese número 2:", end =" ")
        n2 = int(input())
    elif option == "2":
        msg = "Suma: " + str(n1) + " + " + str(n2) + " = " \
            + str(sum(n1, n2))
        show(msg)
    elif option == "3":
        msg = "Resta: " + str(n1) + " - " + str(n2) + " = " \
            + str(substract(n1, n2))
        show(msg)
    elif option == "4":
        msg = "Multiplicación: " + str(n1) + " * " + str(n2) + " = " \
            + str(multiply(n1, n2))
        show(msg)
    elif option == "5":
        if n2 != 0:
            msg = "División: " + str(n1) + " / " + str(n2) + " = " \
                    + str(divide(n1, n2))
            show(msg)
        else:
            show("¡Error, división por 0!")
    elif option == "6":
        msg = "Número 1: " + str(n1) + " \tNúmero 2: " + str(n2)
        show(msg)
    elif option == "7":
        system('cls')
    elif option == "8":
        show("Programa terminado")