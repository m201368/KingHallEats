function specificRequest() {
  var select = document.getElementById("cat");
  var category = select.options[select.selectedIndex].value;

  if (category == "meal") {
    document.getElementById("specificFood").innerHTML = "<select name=\"sFood\">"+
                                             "<option value=\" \">Specific Food</option>"+
                                             "<option value=\"entree\">Entree</option>"+
                                             "<option value=\"salad\">Salad Bar</option>"+
                                             "<option value=\"pizza\">Pizza</option>"+
                                             "</select><br>";
  } else if (category == "dairy") {
    document.getElementById("specificFood").innerHTML = "<select name=\"sFood\">"+
                                             "<option value=\" \">Specific Food</option>"+
                                             "<option value=\"wMilk\">Milk (Whole)</option>"+
                                             "<option value=\"tMilk\">Milk (2%)</option>"+
                                             "<option value=\"sMilk\">Milk (Skim)</option>"+
                                             "<option value=\"aMilk\">Silk Milk</option>"+
                                             "<option value=\"cMilk\">Chocolate Milk</option>"+
                                             "<option value=\"yogurt\">Yogurt</option>"+
                                             "</select><br>";
  } else if (category == "cereal") {
    document.getElementById("specificFood").innerHTML = "<select name=\"sFood\">"+
                                             "<option value=\" \">Specific Food</option>"+
                                             "<option value=\"luckyCharms\">Lucky Charm's</option>"+
                                             "<option value=\"kashi\">Kashi</option>"+
                                             "<option value=\"specialK\">Special K</option>"+
                                             "<option value=\"raisinBran\">Raisin Bran</option>"+
                                             "<option value=\"krave\">Krave</option>"+
                                             "<option value=\"cheerios\">Honey Nut Cheerios</option>"+
                                             "</select><br>";
  } else if (category == "produce") {
    document.getElementById("specificFood").innerHTML = "<select name=\"sFood\">"+
                                             "<option value=\" \">Specific Food</option>"+
                                             "<option value=\"carrots\">Carrots</option>"+
                                             "<option value=\"beans\">Green Beans</option>"+
                                             "<option value=\"blend\">Vegetable Blend</option>"+
                                             "<option value=\"salad\">Salad</option>"+
                                             "</select><br>";
  } else if (category == "snax") {
    document.getElementById("specificFood").innerHTML = "<select name=\"sFood\">"+
                                             "<option value=\" \">Specific Food</option>"+
                                             "<option value=\"cookie\">Cookie</option>"+
                                             "<option value=\"brownie\">Brownie</option>"+
                                             "<option value=\"bar\">Granola Bar</option>"+
                                             "<option value=\"hStinger\">Honey Stinger</option>"+
                                             "</select><br>";
  } else {
    document.getElementById("specificFood").innerHTML = "<b>Please input a valid Food Category</b><br><br><br>";
  }
}
