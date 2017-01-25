function style_list(element,modal){

	this.styles;
	this.current_style;
	this.temp_rank;
	this.update_style = false;
	this.update_rank = false;
	this.current_rank_patern = "solid";
	this.current_rank_index;
	this.current_style_index;

	this.change_rank_patern = function(str)
	{
		this.current_rank_patern = str;
	}

	this.returnData = function()
	{
		var array = [];

		for(var i = 0; i < this.styles.length; i++)
		{
			var ranks = [];

			for(var x = 0; x < this.styles[i].ranks.length; x++)
			{
				ranks.push({priority:this.styles[i].ranks[x].priority_number,rank_name:this.styles[i].ranks[x].name,primary_color:this.styles[i].ranks[x].primary_color,secondary_color:this.styles[i].ranks[x].secondary_color,pattern:this.styles[i].ranks[x].patern});
			}

			array.push({style_name:this.styles[i].name,style_description:this.styles[i].description,'ranks':ranks});
		}

		console.log(array);

		return array;
	}

	this.init = function(){

		var object = this;

		this.styles = [];

		$(element.getElementsByClassName('add_style_bttn')[0]).click(function(){
			$(modal).modal('show');

			object.update_style = false;
			object.update_rank = false;

			object.current_style = new style(object);

			object.current_style.init();

			object.displayStyle(true,0);

		});

		$(modal.getElementsByClassName('add_rank_bttn')[0]).click(function(){

			object.temp_rank = new style_rank(object);

			object.displayRank(true,0);

		});

		$(modal.getElementsByClassName('cancel_add_rank')[0]).click(function(){
			view_rank_table();
		});

		$(modal.getElementsByClassName('submit_style_bttn')[0]).click(function(){

			if(object.validate_current_style())
			{
				$(modal).modal('hide');

				if(object.update_style)
				{
					object.styles[object.current_style_index].name = modal.getElementsByClassName('stylename')[0].value;
					object.styles[object.current_style_index].description = modal.getElementsByClassName('style_description')[0].value;
					object.styles[object.current_style_index].update_element();
					object.update_style = false;
				}
				else
				{
					object.current_style.name = modal.getElementsByClassName('stylename')[0].value;
					object.current_style.description = modal.getElementsByClassName('style_description')[0].value;
					object.current_style.create_element();
				}
			}
		});

		$(modal.getElementsByClassName('submit_rank_bttn')[0]).click(function(){
			if(object.validate_current_rank())
			{
				if(object.update_rank)
				{
					view_rank_table()
					object.update_rank = false;
					object.current_style.ranks[object.current_rank_index].name = modal.getElementsByClassName('rankName')[0].value;
					object.current_style.ranks[object.current_rank_index].primary_color = modal.getElementsByClassName('rank_primary_color')[0].value;
					object.current_style.ranks[object.current_rank_index].secondary_color = modal.getElementsByClassName('rank_secondary_color')[0].value;
					object.temp_rank.patern = object.current_rank_patern;
					object.current_style.ranks[object.current_rank_index].update_element();
				}
				else
				{
					object.temp_rank.name = modal.getElementsByClassName('rankName')[0].value;
					object.temp_rank.primary_color = modal.getElementsByClassName('rank_primary_color')[0].value;
					object.temp_rank.secondary_color = modal.getElementsByClassName('rank_secondary_color')[0].value;
					object.temp_rank.patern = object.current_rank_patern;
					object.temp_rank.priority_number = object.current_style.ranks.length+1;
					object.temp_rank.create_element();
				}
			}
		});

	}

	this.validate_current_style = function()
	{
		$('.input-form').removeClass('has-feedback');

		if(modal.getElementsByClassName('stylename')[0].value == "")
		{
			$(modal.getElementsByClassName('stylename')[0].parentNode).addClass('has-feedback');
			return false;
		}

		if(modal.getElementsByClassName('style_description')[0].value == "")
		{
			$(modal.getElementsByClassName('style_description')[0].parentNode).addClass('has-feedback');
			return false;
		}

		return true;
	}

	this.validate_current_rank = function()
	{
		$('.input-form').removeClass('has-feedback');
		
		if(modal.getElementsByClassName('rankName')[0].value == "")
		{
			$(modal.getElementsByClassName('rankName')[0].parentNode).addClass('has-feedback');
			return false;
		}
		if(!(/^#[0-9A-F]{6}$/i.test('#'+modal.getElementsByClassName('rank_primary_color')[0].value)))
		{
			alert("Invalid primary color.");
			return false;
		}
		if(!(/^#[0-9A-F]{6}$/i.test('#'+modal.getElementsByClassName('rank_secondary_color')[0].value)))
		{
			alert("Invalid secondary color.");
			return false;
		}

		return true;
	}

	this.add_style = function(html)
	{
		this.styles.push(this.current_style);
		element.getElementsByClassName('style_list')[0].appendChild(html);
		return this.styles.length;
	}

	this.add_rank = function(html)
	{
		view_rank_table();
		modal.getElementsByClassName('ranks')[0].appendChild(html);
		return this.current_style.add_rank(this.temp_rank);
	}

	String.prototype.replaceAt=function(index, character) {
	    return this.substr(0, index) + character + this.substr(index+character.length);
	}

	this.displayStyle = function(add,index)
	{
		$(modal).modal('show');
		view_rank_table();
		if(add)
		{
			modal.getElementsByClassName('stylename')[0].value="";
			modal.getElementsByClassName('style_description')[0].value = "";
			modal.getElementsByClassName('ranks')[0].innerHTML = "";
		}
		else
		{
			this.current_style_index = index;
			this.update_style = true;
			this.current_style = this.styles[index];
			modal.getElementsByClassName('ranks')[0].innerHTML = "";
			modal.getElementsByClassName('stylename')[0].value = this.styles[index].name;
			modal.getElementsByClassName('style_description')[0].value = this.styles[index].description;

			if(this.styles[index].ranks.length >= 2)
			{
				var str_priorities = "";
				var rank_priorities = "";

				for(var i = 0; i < this.styles[index].ranks.length; i++)
				{
					if(i==0){
						rank_priorities = 0;
						str_priorities = this.styles[index].ranks[i].priority_number;
					}
					else{
						rank_priorities = rank_priorities +","+i;
						str_priorities = str_priorities +","+this.styles[index].ranks[i].priority_number;
					}
				}

				rank_priorities = rank_priorities.split(",");
				str_priorities = str_priorities.split(",");

				for(var i = 0; i < str_priorities.length; i++)
				{
					var current_index = i;

					for(var y = 0; y < str_priorities.length; y++)
					{
						if(current_index < y)
						{
							if(parseInt(str_priorities[current_index]) > parseInt(str_priorities[y]))
							{
								var char1 = str_priorities[current_index];
								var char2 = rank_priorities[current_index];
								rank_priorities[current_index] = rank_priorities[y];
								rank_priorities[y] = char2;
								str_priorities[current_index] = str_priorities[y];
								str_priorities[y] = char1;
								current_index = y;
							}
						}
						else
						{
							if(parseInt(str_priorities[current_index]) < parseInt(str_priorities[y]))
							{
								var char1 = str_priorities[current_index];
								var char2 = rank_priorities[current_index];
								rank_priorities[current_index] = rank_priorities[y];
								rank_priorities[y] = char2;
								str_priorities[current_index] = str_priorities[y];
								str_priorities[y] = char1;
								current_index = y;
							}
						}
					}
				}

				for(var i = 0; i < rank_priorities.length; i++)
				{
					modal.getElementsByClassName('ranks')[0].appendChild(this.styles[index].ranks[rank_priorities[i]].html_element);
				}
			}
			else if(this.styles[index].ranks.length == 1)
			{
				modal.getElementsByClassName('ranks')[0].appendChild(this.styles[index].ranks[0].html_element);
			}
		}
	}

	this.removeRank = function(index)
	{
		if(this.update_style)
		{
			this.styles[this.current_style_index].ranks.splice(this.styles[this.current_style_index].ranks[index],1);
		}
		else
		{
			this.current_style.ranks.splice(this.current_style.ranks[index],1);
		}
	}

	this.removeStyle = function(index)
	{
		element.getElementsByClassName('style_list')[0].removeChild(this.styles[index].html_element);
		this.styles.splice(this.styles[index],1);
	}

	this.displayRank = function(add,index)
	{
		view_rank();
		$( modal.getElementsByClassName('rank_primary_color')[0] ).focus();
		setTimeout(function(){
			$( modal.getElementsByClassName('rank_secondary_color')[0] ).focus();
			setTimeout(function(){
				$( modal.getElementsByClassName('rankName')[0] ).focus();
			},20);
		},10);
		if(add)
		{
			modal.getElementsByClassName('rankName')[0].value = "";
			modal.getElementsByClassName('rank_primary_color')[0].value = "FFFFFF";
			modal.getElementsByClassName('rank_secondary_color')[0].value = "FFFFFF";
		}
		else
		{
			this.current_rank_index = index;
			this.update_rank = true;
			this.temp_rank = this.current_style.ranks[index];
			modal.getElementsByClassName('rankName')[0].value = this.temp_rank.name;
			modal.getElementsByClassName('rank_primary_color')[0].value = this.temp_rank.primary_color;
			modal.getElementsByClassName('rank_secondary_color')[0].value = this.temp_rank.secondary_color;
			this.current_rank_patern = this.temp_rank.patern;
			if(this.current_rank_patern == "solid")
			{
				chooseSolid(modal.getElementsByClassName("belt belt-small")[0]);
			}
			else if(this.current_rank_patern == "double")
			{
				chooseDouble(modal.getElementsByClassName("belt belt-small")[1]);
			}
			else
			{
				chooseStripe(modal.getElementsByClassName("belt belt-small")[2]);
			}
			// alert(index);
		}
	}

	function view_rank()
	{
		document.getElementsByClassName("rank_container_view")[0].style.display="block";
		document.getElementsByClassName("ranks_table")[0].style.opacity="0";
		setTimeout(function(){
			document.getElementsByClassName("rank_container_view")[0].style.opacity="1";
		},10);
		setTimeout(function(){
			document.getElementsByClassName("ranks_table")[0].style.display="none";
		},500);
	}

	function view_rank_table()
	{
		document.getElementsByClassName("ranks_table")[0].style.display="block";
		document.getElementsByClassName("rank_container_view")[0].style.opacity="0";
		document.getElementsByClassName("ranks_table")[0].style.opacity="1";
		document.getElementsByClassName("rank_container_view")[0].style.display="none";
	}
}

function style(styleList)
{
	this.name;
	this.description;
	this.ranks;

	this.html_element;

	this.init = function()
	{
		this.ranks = [];
	}

	this.create_element = function()
	{
		this.html_element = document.createElement('div');
		this.html_element.className = "col-lg-2 tile";
		this.html_element.innerHTML =  document.getElementById('dummy_style').innerHTML;

		var style_index = styleList.add_style(this.html_element) - 1;

		this.html_element.getElementsByClassName('style_name')[0].innerHTML = this.name;

		$(this.html_element.getElementsByClassName('tile_item')[0]).click(function(){

			styleList.update_style = true;

			styleList.displayStyle(false,style_index);
		});

		$(this.html_element.getElementsByClassName("tile_close")[0]).click(function(){
			styleList.removeStyle(style_index);
		});
	}

	this.update_element = function()
	{
		this.html_element.getElementsByClassName('style_name')[0].innerHTML = this.name;
	}

	this.setName = function(str)
	{
		this.name = str;
	}

	this.setDescription = function(str)
	{
		this.description = str;
	}

	this.add_rank = function(rank)
	{
		this.ranks.push(rank);

		var object = this;

		$(rank.html_element).hover(function(){

			var current_index = 0;

			for(var i = 0; i < object.ranks.length; i++)
			{
				if(object.ranks[i].priority_number == this.getElementsByClassName('priority')[0].innerHTML)
				{
					current_index = i;
				}
			}

			object.ranks[current_index].priority_number = rank.priority_number;

			rank.priority_number = this.getElementsByClassName('priority')[0].innerHTML;
		});

		return this.ranks.length;
	}
}

function style_rank(styleList)
{
	this.name;
	this.priority_number;
	this.patern;
	this.primary_color;
	this.secondary_color;

	this.html_element;

	this.setName = function(str)
	{
		this.name = str;
	}

	this.setPatern = function(str)
	{
		this.patern = str;
	}

	this.setPrimaryColor = function(str)
	{
		this.primary_color = str;
	}

	this.secondary_color = function(str)
	{
		this.secondary_color = str;
	}

	this.create_element = function()
	{
		var object = this;
		this.html_element = document.createElement('tr');

		var priority_td = document.createElement('td');
		priority_td.className = "priority";

		var name_td = document.createElement('td');
		name_td.className = "rank_name";

		var close_td = document.createElement('td');
		close_td.className = "remove_rank";
		close_td.innerHTML = '<p class="fa fa-times-circle-o"></p>';

		var belt_td = document.createElement('td');
		belt_td.className = "beltContainer";

		this.html_element.appendChild(priority_td);
		this.html_element.appendChild(name_td);
		this.html_element.appendChild(belt_td);
		this.html_element.appendChild(close_td);

		this.update_element();

		var rank_index = styleList.add_rank(this.html_element)-1;

		$(priority_td).click(function(){
			styleList.displayRank(false,rank_index);
		});
		$(belt_td).click(function(){
			styleList.displayRank(false,rank_index);
		});
		$(name_td).click(function(){
			styleList.displayRank(false,rank_index);
		});

		$(close_td.getElementsByTagName('p')[0]).click(function(){
			styleList.removeRank(rank_index);
			object.html_element.parentNode.removeChild(object.html_element);
		});
	}

	this.update_element = function()
	{
		this.html_element.getElementsByClassName('priority')[0].innerHTML = this.priority_number;
		this.html_element.getElementsByClassName('rank_name')[0].innerHTML = this.name;
		this.html_element.getElementsByClassName('rank_name')[0].innerHTML = this.name;

		var belt_ul = document.createElement('ul');
		var belt_container = document.createElement('div');
		belt_container.className = "item_belt";
		belt_container.appendChild(belt_ul);

		if(this.patern == "solid")
		{
			var lis = '<li style="height:25%; background:#'+this.primary_color+';">';
			lis = lis + ('<li style="height:25%; background:#'+this.primary_color+';">');
			lis= lis +('<li style="height:25%; background:#'+this.primary_color+';">');
			lis= lis +('<li style="height:25%; background:#'+this.primary_color+';">');
			belt_ul.innerHTML = lis;
		}
		else if(this.patern == "double")
		{
			var lis = '<li style="height:25%; background:#'+this.primary_color+';">';
			lis= lis +('<li style="height:25%; background:#'+this.primary_color+';">');
			lis= lis +('<li style="height:25%; background:#'+this.secondary_color+';">');
			lis= lis +('<li style="height:25%; background:#'+this.secondary_color+';">');
			belt_ul.innerHTML = lis;;
		}
		else if(this.patern == "stripe")
		{
			var lis = '<li style="height:25%; background:#'+this.secondary_color+';">';
			lis= lis +('<li style="height:25%; background:#'+this.primary_color+';">');
			lis= lis +('<li style="height:25%; background:#'+this.primary_color+';">');
			lis= lis +('<li style="height:25%; background:#'+this.secondary_color+';">');
			belt_ul.innerHTML = lis;
		}

		$(this.html_element.getElementsByClassName('beltContainer')[0]).html(belt_container);
		
	}
}