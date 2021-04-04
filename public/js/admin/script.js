//// Check All Checkboxes
$(function () {
    $('#selectAllBoxes').on('click', function () {
        if (this.checked) {
            $('.checkBoxes').each(function () {
                this.checked = true;
            });
        } else {
            $('.checkBoxes').each(function () {
                this.checked = false;
            });
        }
    });
});

//// Order by ASC/DESC Alphabetical
function sortTable(n, tableId) {
    let table,
        rows,
        switching,
        i,
        x,
        y,
        shouldSwitch,
        dir,
        switchcount = 0;
    table = document.getElementById(tableId);
    switching = true;
    // Set the sorting direction to ascending:
    dir = 'asc';

    /* Make a loop that will continue until
    no switching has been done: */
    while (switching) {
        // Start by saying: no switching is done:
        switching = false;
        rows = table.rows;
        /* Loop through all table rows (except the
      first, which contains table headers): */
        for (i = 1; i < rows.length - 1; i++) {
            // Start by saying there should be no switching:
            shouldSwitch = false;
            /* Get the two elements you want to compare,
        one from current row and one from the next: */
            x = rows[i].getElementsByTagName('TD')[n];
            y = rows[i + 1].getElementsByTagName('TD')[n];
            /* Check if the two rows should switch place,
        based on the direction, asc or desc: */
            if (dir == 'asc') {
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                    // If so, mark as a switch and break the loop:
                    shouldSwitch = true;
                    break;
                }
            } else if (dir == 'desc') {
                if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                    // If so, mark as a switch and break the loop:
                    shouldSwitch = true;
                    break;
                }
            }
        }

        if (shouldSwitch) {
            /* If a switch has been marked, make the switch
        and mark that a switch has been done: */
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            // Each time a switch is done, increase this count by 1:
            switchcount++;
        } else {
            /* If no switching has been done AND the direction is "asc",
        set the direction to "desc" and run the while loop again. */
            if (switchcount == 0 && dir == 'asc') {
                dir = 'desc';
                switching = true;
            }
        }
    }
}

//// Order by ASC/DESC Numerical
function sortTableNum(n, tableId) {
    let table,
        rows,
        switching,
        i,
        x,
        y,
        shouldSwitch,
        dir,
        switchcount = 0;
    table = document.getElementById(tableId);
    switching = true;
    // Set the sorting direction to ascending:
    dir = 'asc';

    /* Make a loop that will continue until
    no switching has been done: */
    while (switching) {
        // Start by saying: no switching is done:
        switching = false;
        rows = table.rows;
        /* Loop through all table rows (except the
      first, which contains table headers): */
        for (i = 1; i < rows.length - 1; i++) {
            // Start by saying there should be no switching:
            shouldSwitch = false;
            /* Get the two elements you want to compare,
        one from current row and one from the next: */
            x = rows[i].getElementsByTagName('TD')[n];
            y = rows[i + 1].getElementsByTagName('TD')[n];
            /* Check if the two rows should switch place,
        based on the direction, asc or desc: */
            if (dir == 'asc') {
                if (
                    Number(x.innerHTML.replace(/\D/g, '')) >
                    Number(y.innerHTML.replace(/\D/g, ''))
                ) {
                    // If so, mark as a switch and break the loop:
                    shouldSwitch = true;
                    break;
                }
            } else if (dir == 'desc') {
                if (
                    Number(x.innerHTML.replace(/\D/g, '')) <
                    Number(y.innerHTML.replace(/\D/g, ''))
                ) {
                    // If so, mark as a switch and break the loop:
                    shouldSwitch = true;
                    break;
                }
            }
        }
        if (shouldSwitch) {
            /* If a switch has been marked, make the switch
        and mark that a switch has been done: */
            rows[i + 1].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            // Each time a switch is done, increase this count by 1:
            switchcount++;
        } else {
            /* If no switching has been done AND the direction is "asc",
        set the direction to "desc" and run the while loop again. */
            if (switchcount == 0 && dir == 'asc') {
                dir = 'desc';
                switching = true;
            }
        }
    }
}

// Up arrow symbol
const upA = '&#9650;';

// Down arrow symbol
const downA = '&#9660;';

const th = '.thArrow';

///// Deletes all arrows before inserting a new arrow
function deleteArrows() {
    for (let i = 1; i < 9; i++) {
        let element = th + i;
        let str = $(element).html();
        if (str == undefined) {
            break;
        } else {
            str = str.replace('▼', '');
            str = str.replace('▲', '');
            $(element).html(str);
        }
    }
}

function insertToggleArrow() {
    let str = $(this).html();
    if (str.includes('▼')) {
        str = str.replace('▼', upA);
        $(this).html(str);
    } else if (str.includes('▲')) {
        str = str.replace('▲', downA);
        $(this).html(str);
    } else if (!str.includes('▲') && !str.includes('▼')) {
        deleteArrows();
        $(this).append(` ${downA}`);
    }
}

// Arrow function, calls insertToggleArrow(), which calls deleteArrows() if needed
$(function () {
    for (let i = 1; i < 9; i++) {
        let element = th + i;
        $(element).on('click', insertToggleArrow);
    }
});

// Toggle active nav link
$(function () {
    if ($(location).attr('href') == 'http://localhost/uruk_mvc/admin') {
        $('#nav-dash').addClass('active');
    } else if (
        $(location).attr('href') == 'http://localhost/uruk_mvc/admin/addPost'
    ) {
        $('#nav-add').addClass('active');
    }
});
