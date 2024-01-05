// Función sumaNumeros para sumar dos números enteros
Funcion sum <- sumaNumeros (x, z)
	sum <- x + z
Fin Funcion


// Procedimiento imprimirInfo para mostrar un dato. No devuelve valores
SubAlgoritmo imprimirInfo(dato)
	Imprimir dato
FinSubAlgoritmo


// Procedimiento duplicar; recibe un parámetro por valor y otro por referencia
SubAlgoritmo duplicar(num1 Por Valor, num2 Por Referencia)
	num1 <- num1 * 2	
	num2 <- num2 * 2	
	Imprimir "Número 1 duplicado: ", num1
	Imprimir "Número 2 duplicado: ", num2
FinSubAlgoritmo


// Programa principal desde donde se llaman los subprogramas 
Algoritmo ProgramaPrincipal
	Definir a, b Como Caracter
	Definir n1, n2, s Como Entero
	Imprimir "Ingrese a: " Sin Saltar
	Leer a
	si a no es numero Entonces
		a <- "0"
	FinSi
	n1 <- ConvertirANumero(a)
	Imprimir "Ingrese b: " Sin Saltar
	Leer b
	si b no es numero Entonces
		b <- "0"
	FinSi
	n2 <- ConvertirANumero(b)
	s <- sumaNumeros(n1, n2)
	imprimirInfo("Resultado suma: " + ConvertirATexto(s))
	duplicar(n1, n2)
	imprimirInfo("Valor de a: " + ConvertirATexto(n1))
	imprimirInfo("Valor de b: " + ConvertirATexto(n2))
FinAlgoritmo
