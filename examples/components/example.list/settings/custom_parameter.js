function onLoadParameters(arParams)
{
	if (null != window.exampleCustomParameter)
	{
		window.exampleCustomParameter = null;
	}

	window.exampleCustomParameter = new ExampleCustomParameter(arParams);
}

function ExampleCustomParameter(arParams)
{
	this.jsOptions = arParams.data;
	this.arParams = arParams;

	let fieldDate = document.createElement('INPUT');
    fieldDate.type = 'date';
    fieldDate.value = this.arParams.oInput.value ?? '';
    fieldDate.style = this.jsOptions.style ?? null
	this.arParams.oCont.appendChild(fieldDate);

    fieldDate.onchange = BX.delegate(this.__saveData, this);
}

ExampleCustomParameter.prototype.__saveData = function(evt)
{
	this.arParams.oInput.value = evt.target.value;
}