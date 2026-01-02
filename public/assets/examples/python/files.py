print("----------Lectura general----------")
with open('files/file.txt', 'r') as file:
    content = file.read()
    print(content)
    print("Tipo de dato de la variable que recibe el archivo: " \
         + str(type(content)))

print("***** Lectura línea a línea\
(line incluye \\n en cada línea) *****")
with open('files/file.txt', 'r') as f:
    for line in f:
        print(line)



f = open('files/file2.txt', 'w')
try:
    print("Archivo creado")
finally:
    f.close()


# with open('mi_fichero', 'w') as f:
#     print("")


with open('files/file2.txt', 'r+') as file:
    file.write("Hola, este es el contenido inicial para el archivo 'files/file2.txt'")


with open('files/file2.txt', 'a') as file:
    file.write("\nHola, más contenido")

with open('files/file2.txt', 'r') as file:
    content = file.read()
    print(content)
