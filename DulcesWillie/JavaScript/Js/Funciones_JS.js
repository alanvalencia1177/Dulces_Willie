function Validar_Contrasena() {
	//Validaremos cajas de texto
	//Declaramos variables
	var Contra1, Contra2, Resultado;

	Contra1 = document.Formulario_Padre.Contrasena_txt1.value;
	Contra2 = document.Formulario_Padre.Contrasena_txt2.value;

	if (Contra2 = Contra1)
	{
		alert("Bien perfecto");
	}
	else
	{
		alert("las contraseñas no coinciden");
	}
}