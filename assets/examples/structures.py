def sum_array(array_data):
    ''' Función para sumar los datos de una vector de números '''
    s = 0
    for data in array_data:
        s += data
    return s


list = [
    10,
    20,
    30,
    40,
    50,
    60,
    70
]
print("Lista:")
print(list)
print("Lista 2 en posición 2: " + str(list[2]))
print("Suma datos lista: " + str(sum_array(list)))