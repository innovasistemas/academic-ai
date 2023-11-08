SubAlgoritmo llenarMatriz(matriz, m, n)
	Definir i, j como Entero
	Para i = 1 Hasta m
		Para j = 1 Hasta n
			Imprimir "Ingrese el elemento [", i, ", ", j, "]" Sin Saltar
			Leer matriz[i, j]
		FinPara
	FinPara
FinSubAlgoritmo


SubAlgoritmo mostrarMatriz(matriz, m, n)
	Definir i, j como Entero
	Para i = 1 Hasta m
		Para j = 1 Hasta n
			Imprimir matriz[i, j], "   " Sin Saltar
		FinPara
		Imprimir ""
	FinPara
FinSubAlgoritmo


Algoritmo Matrices
	
	Dimension matriz[30, 30]
	Definir matriz, m, n Como Entero 
	
	Imprimir "Número de filas: " Sin Saltar
	Leer m
	Imprimir "Número de columnas: " Sin Saltar
	Leer n
	
	llenarMatriz(matriz, m, n)
	mostrarMatriz(matriz, m, n)
	
	
FinAlgoritmo
