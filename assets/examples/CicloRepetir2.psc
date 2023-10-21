Algoritmo CicloRepetir
	Definir tp Como Entero
	Definir nota, sumaNota, menorNota, promedio Como Real
	Definir nombre, menorNombre Como Caracter
	tp = 0 //Total personas: contador
	sumaNota = 0 //Suma de notas para hallar promedio
	menorNota = 6
	Repetir
		Imprimir "Nombre: " Sin Saltar
		Leer nombre
		Imprimir "nota: " Sin Saltar
		Leer nota
		Si nombre <> '*' Y nota >= 0 Y nota <= 5
			tp = tp + 1
			sumaNota = sumaNota + nota
			Si nota < menorNota Entonces
				menorNota = nota
				menorNombre = nombre
			FinSi
		SiNo
			Imprimir "----- Último registro no procesado -----"
		FinSi
	Hasta Que nombre = '*'
	Imprimir " "
	Imprimir "***** Resumen *****"
	Imprimir "Total estudiantes: ", tp
	Si tp > 0
		Imprimir "Peor nota --> ", menorNombre, ": ", menorNota
		promedio = sumaNota / tp
		Imprimir "promedio notas: ", promedio
	FinSi

FinAlgoritmo
