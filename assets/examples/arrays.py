from os import system
from colorama import Fore, Back, Style

def addList(array, datum) -> None:
    array.append(datum)


def showList(array) -> None:
    print(array)
    print("")
    l =  len(array)
    for i in range(l):
        print("-----", end = "")
    print("\n|", end = "")
    for d in array:
        print(d, "|", end = "")
    print("")
    for i in range(l):
        print("-----", end = "")


def searchList(array, datum) -> int:
    index = 0
    position = -1
    length = len(array)
    while index < length and position == -1:
        if array[index] == datum:
            position = index
        else:
            index += 1
    return position


def sumArray(array) -> float:
    sum = 0
    for index, value in enumerate(array):
       sum += array[index] 
    return sum


def maxArray(array) -> float:
    m = array[0]
    for index, value in enumerate(array, 1):
       if value > m:
           m = value
    return m


def minArray(array) -> float:
    m = array[0]
    for index, value in enumerate(array, 1):
       if value < m:
           m = value
    return m


system('cls')
values = []
option = ""
while option.upper() != "X":
    print(Fore.LIGHTGREEN_EX + Back.BLACK)
    print("===========================================")
    print("||           Menú de opciones            ||")
    print("===========================================")
    print(Fore.LIGHTBLUE_EX)
    print("            1. Agregar")
    print("            2. Mostrar")
    print("            3. Buscar")
    print("            4. Actualizar")
    print("            5. Eliminar")
    print("            6. Sumar datos")
    print("            7. Promedio datos")
    print("            8. Mayor dato")
    print("            9. Menor dato")
    print("            0. Limpiar pantalla")
    print("            X. Salir")
    print(Fore.LIGHTYELLOW_EX)
    option = input("            Digite opción: ")
    
    if option == "1":
        datum = float(input("\nDato a agregar: "))
        addList(values, datum)
    elif option == "2":
        if len(values) > 0:
            showList(values)
        else:
            print('No hay datos en la lista')
    elif option == "3":
        if len(values) > 0:
            datum = float(input("\nDato a buscar: "))
            pos = searchList(values, datum)
            if pos > -1:
                print(f'\nDato encontrado en posición: {pos}')
            else:
                print('El dato no se encuentra en la lista')
        else:
            print('No hay datos en la lista')
    elif option == "4":
        if len(values) > 0:
            datum = float(input("\nDato a modificar: "))
            pos = searchList(values, datum)
            if pos > -1:
                datum = float(input("\nNuevo dato: "))
                values[pos] = datum
                print(f'\nDato en posición {pos} actualizado')
            else:
                print('El dato no se encuentra en la lista')
        else:
            print('No hay datos en la lista')
    elif option == "5":
        if len(values) > 0:
            datum = float(input("\nDato a eliminar: "))
            pos = searchList(values, datum)
            if pos > -1:
                values.pop(pos)
                print(f'\nDato {datum} eliminado')
            else:
                print('El dato no se encuentra en la lista')
        else:
            print('No hay datos en la lista')
    elif option == "6":
        if len(values) > 0:
            print(f'\nSuma datos lista: {sumArray(values)}')
        else:
            print('No hay datos en la lista')
    elif option == "7":
        if len(values) > 0:
            prom = sumArray(values) / len(values)
            print(f'\nPromedio datos lista: {prom}')
        else:
            print('No hay datos en la lista')
    elif option == "8":
        if len(values) > 0:
            print(f'\nMayor dato lista: {maxArray(values)}')
        else:
            print('No hay datos en la lista')
    elif option == "9":
        if len(values) > 0:
            print(f'\nMenor dato lista: {minArray(values)}')
        else:
            print('No hay datos en la lista')
    elif option == "0":
        system('cls')
    elif option.upper() == "X":
        print(Fore.LIGHTGREEN_EX, '\n          Programa finalizado')
        print(Style.RESET_ALL)
    else:
        print("")
        print(Back.LIGHTWHITE_EX + "                                        ")
        print(Fore.LIGHTRED_EX + Back.LIGHTWHITE_EX, '            Opción no válida           ')
        print(Back.LIGHTWHITE_EX + "                                        ")
