var salle =['AP1','AP2','A1','A2','A3','A4','CP1','CP2','CP3','CP4','CP5','CP6','CP7','CP8','CP9','S4','S4B','S5','S6','S7','S8','S9','S10','S11','S12','S13','S14','S15','S16','S17','S18','S19','S20','S21','AUD','BIB','CYB','SCBP']; //table des salles 
		
		function epuration(t) //fonction d'epuration d'un tableau pour supprimer les isions 
		{
			var tab =[];
			for(var i=0;i<t.length;i++)
			{
				if(tab.indexOf(t[i])==-1)
				{
					tab.push(t[i]);
				}
			}

			return tab;

		}
		function selectSl(t,div)//permert de creer un select a partir d'un tableau 
		{
			exist=document.getElementById("slct");
			if(exist!=null)
				{var vider=$('#slct');
			vider.remove();}
			var selectList = document.createElement("select");
			selectList.id = "slct";
			selectList.setAttribute("multiple","");
			selectList.setAttribute("name","select[]");
			selectList.classList.add('form-control');
			div.appendChild(selectList);
			for (var i = 0; i < t.length; i++) {
				var option = document.createElement("option");
				option.value = salle.indexOf(t[i])+1;
				option.text = t[i];
				selectList.appendChild(option);
			}
			
		}
		function differance(t) //permet de creer la differance entre un tableau et le tableau de salle
		{
			var deff = [];
			for (var i = 0; i < salle.length; i++) {
				if (t.indexOf(salle[i]) === -1) {
					deff.push(salle[i]);
				}
			}
			return deff;
		}

		function salleLibre()//permet d'afficher les salles libre dans un intervalle !!
		{
			var ddb=document.getElementById('ddb').value;
			var dfn=document.getElementById('dfn').value;
			if (ddb) {if (dfn) {
			if(ddb<=dfn)
				{return $.ajax({
					method: 'POST',
					url: 'sl.php',
					data: {'debut':ddb  , 'fin': dfn,'ajax': true},
					success: function(data){
						selectSl(differance(epuration(data.sort())),document.getElementById("salle_libre"));
					},
					dataType:"json"
				});}}}
		}


		var currentTab = 0; 
		showTab(currentTab); 

		function showTab(n) {

			var x = document.getElementsByClassName("etape");
			x[n].style.display = "block";

			if (n == 0) {
				document.getElementById("prevBtn").style.display = "none";
			} else {
				document.getElementById("prevBtn").style.display = "inline";
				document.getElementById("nextBtn")
			}
			if (n == 2) {
				$("nextBtn").one("click", salleLibre());
			}
			if (n == (x.length - 1)) {
				document.getElementById("nextBtn").innerHTML = "Submit";
			} else {
				document.getElementById("nextBtn").innerHTML = "Next";
			}

			fixStepIndicator(n)
		}

		function nextPrev(n) {

			var x = document.getElementsByClassName("etape");

			x[currentTab].style.display = "none";

			currentTab = currentTab + n;

			if (currentTab >= x.length) {

				document.getElementById("frm").submit();
				return false;
			}
			showTab(currentTab);
		}

		function validateForm() {

			var x, y, i, valid = true;
			x = document.getElementsByClassName("etape");
			y = x[currentTab].getElementsByTagName("input");

			if (valid) {
				document.getElementsByClassName("step")[currentTab].className += " finish";
			}
			return valid; 
		}

		function fixStepIndicator(n) {

			var i, x = document.getElementsByClassName("step");
			for (i = 0; i < x.length; i++) {
				x[i].className = x[i].className.replace(" active", "");
			}

			x[n].className += " active";
		}
		