function calc(formName) {
    var tariff = document.forms[formName]["tariff"].value;
    var tstring = tariff.split(",");
    var fmr = parseInt(tstring[0]);
    var nr = parseInt(tstring[1]);
    var time = document.forms[formName]["time"].value;
    if(fmr == nr){
      var cost = nr * time;
      window.alert("Your call cost "+(cost/100)+" naira");
    }
    else{
      if(time > 60){
        var cost1 = 60 * fmr;
        var cost2 = (time - 60) * nr;
        window.alert("if this is your first call today cost = "+((cost1+cost2)/100)+"naira, \n else cost = "+(time*nr/100)+" naira");
      }
      else {
        var cost1 = time * fmr;
        var cost2 = time * nr;
        window.alert("if this is your first call today cost = "+(cost1/100)+" naira, \n else cost = "+(cost2/100)+" naira");
      }
    }
}
