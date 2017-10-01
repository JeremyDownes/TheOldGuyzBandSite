	<script>
	
					function drag(ev) {
  						ev.dataTransfer.setData("text", ev.target.id);
						
					}

					function allowDrop(ev) {
    						ev.preventDefault();
					}

					function drop(ev) {
						ev.preventDefault();

						var data = ev.dataTransfer.getData("text");
						var target = document.getElementById(ev.target.id);
						var targetClass = target.className;
						if(data.indexOf(".txt")==-1) {		// Checks not a set title IS a list item
							if(ev.target.id == "trash") {
								document.getElementById(data).parentNode.removeChild(document.getElementById(data));
							} else {
								var op = document.getElementById(data); 
								op.className = targetClass;
								target.parentNode.insertBefore(op,target);

							}
						} else {				// returns with ".txt" in the value IS set title
							var delSet = new XMLHttpRequest();
							  delSet.onreadystatechange = function() {
    								if (this.readyState == 4 && this.status == 200) {
								location.reload();
    								}
  								};
							delSet.open("POST", "delSet.php?q="+data, true);
 							delSet.send();
						}
					}

					function edit(ev) {
					document.getElementById(ev.target.id).setAttribute("contenteditable", "true");
					}

					function normal(ev) {
					document.getElementById(ev.target.id).setAttribute("contenteditable", "false");
					}

					function newSong(ev) {
    
						if (ev.key=="Enter") {
						var song = document.createElement("li");
						var title = document.createTextNode(document.getElementById("newSong").value);
						song.appendChild(title); 
						song.setAttribute("class", "list");
						song.setAttribute("draggable", "true");
						song.setAttribute("style", "color:white");
						song.setAttribute("id", document.getElementById("newSong").value);
						song.setAttribute("onblur", "normal(event)");
						song.setAttribute("ondblclick", "edit(event)");
						song.setAttribute("ondrop", "drop(event)");
						song.setAttribute("ondragover", "allowDrop(event)");
						song.setAttribute("ondragstart", "drag(event)");
						document.body.appendChild(song);
						}
					}

</script>