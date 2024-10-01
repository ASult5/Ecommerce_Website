let rowCount = 0;

document.getElementById("addRow").addEventListener("click", function () {
  rowCount++;
  const tableBody = document.querySelector("#dynamicTable tbody");
  const newRow = document.createElement("tr");

  newRow.innerHTML = `
            <td>${rowCount}</td>
            <td><input type="text" class="form-control" placeholder="Enter name"></td>
            <td><input type="number" class="form-control" placeholder="Enter age"></td>
            <td><button class="btn btn-danger btn-sm removeRow">Remove</button></td>
        `;

  tableBody.appendChild(newRow);

  // Add event listener to the remove button
  newRow.querySelector(".removeRow").addEventListener("click", function () {
    tableBody.removeChild(newRow);
    // Update rowCount
    rowCount--;
    // Re-number rows
    updateRowNumbers();
  });
});

function updateRowNumbers() {
  const rows = document.querySelectorAll("#dynamicTable tbody tr");
  rows.forEach((row, index) => {
    row.cells[0].textContent = index + 1; // Update the row number
  });
}

// Function for updating quantity using AJAX
