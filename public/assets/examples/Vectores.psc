Funcion mayor = mayorDatoVector(vec, n)
	Definir i, mayor Como Entero
	mayor = vec[1] // Supuesto: el mayor dato está en la posición 1
	Para i = 2 Hasta n Con Paso 1 Hacer
		Si vec[i] > mayor Entonces
			mayor = vec[i]
		FinSi
	FinPara
Fin Funcion


Funcion s = sumaVector(vec, n)
	Definir i, s Como Entero
	s = 0
	Para i = 1 Hasta n Con Paso 1 Hacer
		s = s + vec[i]
	FinPara
Fin Funcion


SubAlgoritmo llenarVector(vec, n)
	Para i = 1 Hasta n Hacer
		vec[i] = Aleatorio(1, 50)
	FinPara
FinSubAlgoritmo


SubAlgoritmo mostrarVector(vec, n)
	Definir i Como Entero
	Para i = 1 Hasta n Hacer
		Imprimir vec[i], "   " Sin Saltar 
	FinPara
FinSubAlgoritmo


Algoritmo Vectores
	Dimension V[30]
	Definir V, t, i Como Entero
	Imprimir "Total elementos vector: " Sin Saltar
	Leer t
	llenarVector(V, t)
	mostrarVector(V, t)
	Imprimir ""
	Imprimir "Suma vector: ", sumaVector(V, t)
	Imprimir "Mayor dato vector: ", mayorDatoVector(V, t)
FinAlgoritmo
