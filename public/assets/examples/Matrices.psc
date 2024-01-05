SubAlgoritmo mostrarMatriz(mat, m, n)
	Definir i, j Como Entero
	Para i = 1 Hasta m Hacer
		Para j = 1 Hasta n Hacer
			Imprimir ConvertirATexto(mat[i, j]) + "   " Sin Saltar 
		FinPara
		Imprimir ""
	FinPara
FinSubAlgoritmo


Algoritmo Matrices
	Dimension M[30, 30]
	Definir M Como Entero
	Definir i, j Como Entero
	Para i = 1 Hasta 3 Hacer
		Para j = 1 Hasta 3 Hacer
			M[i, j] = Aleatorio(1, 50)
		FinPara
	FinPara
	
	mostrarMatriz(M, 3, 3)
FinAlgoritmo
