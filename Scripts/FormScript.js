class FormScript {
    constructor(inVals, inClass, inSelector) 
    {
        this.inputvals = inVals;
        this.inputClass = inClass;
        this.selector = inSelector;
        this.ChangePasswordType = true;
    }
    inputvals;
    inputClass;
    selector;
    ChangePasswordType;
    FeltKlik(feltIndex)
    {
        this.ValiderFelter(feltIndex);
        if(this.inputvals[feltIndex] === this.selector[feltIndex].value)
        {
            if(this.selector[feltIndex].value === "Kodeord")
            {
                this.selector[feltIndex].type = "password";
            }
            this.selector[feltIndex].value = "";
        }
    }
    PassivFeltKlik(feltIndex)
    {
        this.ChangePasswordType = false;
        this.ValiderFelter(feltIndex);
    }
    ValiderFelter(feltIndex) 
    {
        for (var i = 0; i < this.inputvals.length; i++) 
        {
            if(i !== feltIndex)
            {
                if(this.selector[i].value === "")
                {
                    if(this.selector[i].type === "password" && this.ChangePasswordType === true)
                    {
                        this.selector[i].type = "text";
                    }
                    else if(this.selector[i].type === "password" && this.ChangePasswordType === false)
                    {
                        this.ChangePasswordType = true;
                    }
                    this.selector[i].value = this.inputvals[i];
                }
            }
        }
    }
}