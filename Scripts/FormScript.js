class FormScript {
    constructor(inStartVal, inVals, inClass, inSelector) 
    {
        this.StartVals = inStartVal;
        this.inputvals = inVals;
        this.inputClass = inClass;
        this.selector = inSelector;
        this.ChangePasswordType = true;
    }
    StartVals;
    inputvals;
    inputClass;
    selector;
    ChangePasswordType;
    FeltFokus(feltIndex)
    {
        this.ValiderFelter(feltIndex);
        if(this.inputvals[feltIndex] === this.StartVals[feltIndex])
        {
            if(this.selector[feltIndex].name === "kodeord" || this.selector[feltIndex].name === "loginkodeord")
            {
                this.selector[feltIndex].type = "password";
            }
            this.selector[feltIndex].value = "";
        }
    }
    StartKodeordStatus(kodeordIndex) {
        if(this.selector[kodeordIndex].value !== this.StartVals[kodeordIndex] && this.selector[kodeordIndex].type === "text")
        {
            this.selector[kodeordIndex].type = "password";
        }
    }
    ValiderFelter(feltIndex) 
    {
        for (var i = 0; i < this.inputvals.length; i++) 
        {
            if(i !== feltIndex)
            {
                if(this.selector[i].value === "")
                {
                    this.selector[i].value = this.StartVals[i];
                }
                
                if(this.selector[i].value === "Kodeord" && this.selector[i].type === "password")
                {
                    this.selector[i].type = "text";
                }
                

            }
        }
    }
    PassivFeltKlik(feltIndex)
    {
        this.ChangePasswordType = false;
        this.ValiderFelter(feltIndex);
    }
}