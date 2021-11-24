
function AJAXCommand(input) {
    var xhttp = new XMLHttpRequest();
    
    xhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {

        if (input == "usa.txt" || input == "mexico.txt" || input == "canada.txt" || input =="russia.txt") {
            largestCities(this.response);
        }  

        else if (input == "json.txt" || input == "json1.txt") {
            jsonRequest(this.response);
        }

        } else if (this.readyState == 4 && this.status == 404) {
            document.getElementById('info').innerHTML = "The file you have requested cannot be found. Please try again.";
            document.getElementById('info').style.color = "red";
            document.getElementById('info').style.border = "2px solid red";
            document.getElementById('info').style.fontWeight = "bold";
            document.getElementById('info').style.fontSize = "1.5rem";
      }  
    };
    xhttp.open("GET", input, true);
    xhttp.send();
}

function largestCities(response) {
    var cities = response.split(/\s{2,}|\n/);
    var table = "<table><tr><th>City:</th><th>Population:</th></tr>";
    for (i = 0; i < cities.length - 1; i++) {
    table += "<tr><td>" + 
    cities[i] + 
    "</td><td>" + 
    cities[i + 1] + 
    "</td></tr>";
    i++;
    
}

    table += "</table>";
    document.getElementById('cities').innerHTML = table;

};

function jsonRequest(response) {                 
        var data = JSON.parse(response);
        var table = "<table><tr><th>First Name:</th><th>Last Name:</th><th>City:</th><th>State:</th><th>ZIP Code:</th><th>Major:</th><th>GPA:</th></tr>";
        
        for (var i = 0; i < data.students.length; i++) {
            table += "<tr><td>" +
            data.students[i].first +
            "</td><td>" +
            data.students[i].last +
            "</td><td>" +
            data.students[i].address.city +
            "</td><td>" +
            data.students[i].address.state +
            "</td><td>" +
            data.students[i].address.zip +
            "</td><td>" +
            data.students[i].major +
            "</td><td>" +
            data.students[i].gpa;
        }

    document.getElementById('info').innerHTML = table;
};
