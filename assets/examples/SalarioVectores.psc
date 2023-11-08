Funcion posicion <- buscarDato(vector, n, dato)
	Definir i, posicion Como Entero 
	i = 1
	posicion = 0
	Mientras i <= n Y posicion = 0 
		Si vector[i] = dato 
			posicion = i
		SiNo
			i = i + 1
		FinSi
	FinMientras
Fin Funcion


Funcion suma = sumaSalarios (salarios, n)
	suma = 0
	Para i = 1 Hasta n con paso 1
		suma = suma + salarios[i]
	FinPara
Fin Funcion


SubAlgoritmo leerSalarios(salarios, n)
	Definir i como Entero
	Para i = 1 Hasta n con paso 1
		Imprimir "Ingrese el salario"
		Leer salarios[i]
	FinPara
FinSubAlgoritmo


SubAlgoritmo mostrarSalarios(salarios, n)
	Definir i como Entero
	Para i = 1 Hasta n con paso 1
		Imprimir salarios[i], "   " Sin Saltar
	FinPara
FinSubAlgoritmo


SubAlgoritmo actualizarDato(salarios, pos, nuevoDato)
	salarios[pos] = nuevoDato
FinSubAlgoritmo


Algoritmo SalarioVectores
	Dimension salarios[50]
	Definir salarios, suma, prom, dato, nuevoDato como Real
	Definir n, pos como Entero
	
	Imprimir "Ingrese el total de salarios: " Sin Saltar
	Leer n
	leerSalarios(salarios, n)
	mostrarSalarios(salarios, n)
	suma = sumaSalarios(salarios, n)
	Imprimir ""
	Imprimir "Suma salario: ", suma
	prom = suma / n
	Imprimir "Promedio salario: ", prom
	
	
	Imprimir "Ingrese el salario a buscar: " Sin Saltar
	Leer dato
	pos = buscarDato(salarios, n, dato)
	Si pos = 0 
		Imprimir dato, " no se encuentra en el vector"
	SiNo
		Imprimir dato, " está en posición: ", pos
	FinSi
	
	Imprimir "Ingrese el salario a actualizar: " Sin Saltar
	Leer dato
	pos = buscarDato(salarios, n, dato)
	Si pos = 0 
		Imprimir dato, " no se encuentra en el vector"
	SiNo
		Imprimir "Ingrese el nuevo salario: " Sin Saltar
		Leer nuevoDato
		actualizarDato(salarios, pos, nuevoDato)
		Imprimir "Salario actualizado: ", salarios[pos]
	FinSi
		
FinAlgoritmo
