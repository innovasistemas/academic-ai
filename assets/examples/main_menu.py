from os import system

# Función customers: procesa clientes
def customers():
    system("cls")
    option_customer = ""
    while option_customer != "5":
        print("\033[94mMenú clientes")
        print("1. Crear")
        print("2. Actualizar")
        print("3. Eliminar")
        print("4. Consultar")
        print("5. Regresar")
        print("Ingrese su opción: ", end = "")
        option_customer = input()

        if option_customer == "1":
            create_customer()
        elif option_customer == "2":
            update_customer()
        elif option_customer == "3":
            delete_customer()
        elif option_customer == "4":
            search_customer()
        elif option_customer == "5":
            print("Regresar")
        else:
            print("\033[96mOpción incorrecta")


# Programa principal
option = ""
while option != "4":
    print("\033[92mMenú principal")
    print("1. Clientes")
    print("2. Productos")
    print("3. Ventas")
    print("4. Salir")
    print("Ingrese su opción: ", end = "")
    option = input()

    if option == "1":
        customers()
    elif option == "2":
        products()
    elif option == "3":
        sales()
    elif option == "4":
        print("Programa finalizado")
    else:
        print("\033[96mOpción incorrecta")

    