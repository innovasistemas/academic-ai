cpe = 0 #Contador personas empresa
cp_yes = 0 #Contador personas participan 
cp_no = 0 #Contador personas no participan 
for i in range(1, 4, 1):
    cps = 0 #Contador personas sucursal
    print("--- Sucursal: ", i, " ---")
    print("Ingrese su nombre (* para terminar):", end = " ")
    name = input()
    while name != '*':
        cps = cps + 1
        print("¿Participa en la rifa? (s/n):", end = " ")
        response = input()
        if response == 's':
            cp_yes = cp_yes + 1
        else:
            cp_no = cp_no + 1
        print("Ingrese su nombre (* para terminar)", end = " ")
        name = input()  
    print(f"Total empleados sucursal {i}: {cps}")
    cpe = cpe + cps
print(f"Total empleados empresa: {cpe}")
print(f"Total empleados que participan: {cp_yes}")
print(f"Total empleados que no participan: {cp_no}")
