Algoritmo FuncionesMatematicas
	Definir xx, yy, zz Como Real
	Imprimir "Número 1:" Sin Saltar
	Leer xx
	Imprimir "Número 2:" Sin Saltar
	Leer yy
	z = abs(xx)
	Imprimir "Valor absoluto  de ", xx, ": ", z
	z = raiz(z)
	Imprimir "Raíz cuadrada (raiz) de ", abs(xx), ": ", z
	z = rc(abs(xx))
	Imprimir "Raíz cuadrada (rc) de ", abs(xx), ": ", z
	z = Aleatorio(trunc(xx), trunc(yy))
	Imprimir "Aleatorio entre ", trunc(xx), " y ", trunc(yy), ": ", z
	z = azar(trunc(yy))
	Imprimir "Aleatorio entre 0 y ", trunc(yy), ": ", z
	z = trunc(yy)
	Imprimir "Truncar ", yy, ": ", z
	z = redon(yy)
	Imprimir "Redondear ", yy, ": ", z
	z = sen(xx)
	Imprimir "Seno ", xx, ": ", z
	z = cos(xx)
	Imprimir "Coseno ", xx, ": ", z
	z = tan(xx)
	Imprimir "Tangente ", xx, ": ", z
	z = exp(xx)
	Imprimir "Exponencial ", xx, ": ", z
	z = ln(xx)
	Imprimir "Ln ", xx, ": ", z
	Imprimir "Pi = ", Pi 
FinAlgoritmo
