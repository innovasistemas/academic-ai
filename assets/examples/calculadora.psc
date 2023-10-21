Algoritmo Calculadora
	Escribir "Ingrese el primer número: "
	Leer num1
	Escribir "Ingrese el segundo número: "
	Leer num2
	r = num1 + num2
	Imprimir "Suma: ", r
	r = num1 - num2
	Imprimir "Resta: ", r
	r = num1 * num2
	Imprimir "Producto: ", r
	Si num2 <> 0 Entonces
		r = num1 / num2
		Imprimir "División: ", r
	SiNo
		Imprimir "¡Error! División por 0"
	FinSi
	
FinAlgoritmo
