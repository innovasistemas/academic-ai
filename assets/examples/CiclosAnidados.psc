Algoritmo CiclosAnidados
	Definir cpe, cps, cp_si, cp_no Como Entero
	Definir respuesta, nombre Como Caracter
	cpe = 0 //Contador personas empresa
	cp_si = 0 //Contador personas participan 
	cp_no = 0 //Contador personas no participan 
	Para i = 1 Hasta 3 Con Paso 1
		cps = 0 //Contador personas sucursal
		Imprimir "--- Sucursal: ", i, " ---"
		Imprimir("Ingrese su nombre (* para terminar): ") Sin Saltar
		Leer nombre
		Mientras nombre <> '*' Hacer
			cps = cps + 1
			Imprimir("¿Participa en la rifa? (s/n): ") Sin Saltar
			Leer respuesta
			Si respuesta == 's'
				cp_si = cp_si + 1
			SiNo
				cp_no = cp_no + 1
			FinSi
			Imprimir("Ingrese su nombre (* para terminar): ") Sin Saltar
			Leer nombre
		FinMientras
		Imprimir "Total empleados sucursal: ", i, ": ", cps
		cpe = cpe + cps
	FinPara
	Imprimir "Total empleados empresa: ", cpe
	Imprimir "Total empleados que participan: ", cp_si
	Imprimir "Total empleados que no participan: ", cp_no
FinAlgoritmo
