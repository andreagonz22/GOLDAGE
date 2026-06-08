/* ELEMENTOS */
const $ = id => document.getElementById(id);

/* USER */
$("name").textContent = user.name;
$("email").textContent = user.email;
$("phone").textContent = user.phone;
$("location").textContent = user.location;

/* PATIENT */
$("pName").textContent = patient.name;
$("pAge").textContent = patient.age
    ? patient.age + " years"
    : "";

$("pGender").textContent = patient.gender;
$("pRelation").textContent = patient.relation;
$("pCondition").textContent = patient.condition;

$("pAddress").textContent = patient.address;
$("pAllergies").textContent = patient.allergies;
$("pMedications").textContent = patient.medications;
$("pMobility").textContent = patient.mobility;

/* RENDER */
function render() {

    $("pending").innerHTML = "";
    $("completed").innerHTML = "";

    let pendingCount = 0;
    let doneCount = 0;
    let next = null;

    appointments.forEach(a => {

        if (a.status === "pending") {
            pendingCount++;

            if (!next) {
                next = a.date;
            }
        } else {
            doneCount++;
        }

        const item = document.createElement("div");

        item.className = "appointment " + a.status;

        item.innerHTML = `
            <div class="appointment-info">
                <h4>${a.reason}</h4>
                <p>${a.date} | ${a.time}</p>
            </div>
        `;

        if (a.status === "pending") {

            const btn = document.createElement("button");
            btn.textContent = "Complete";

            btn.onclick = () => {
                a.status = "completed";
                render();
            };

            item.appendChild(btn);
            $("pending").appendChild(item);

        } else {

            const done = document.createElement("span");
            done.className = "done-status";
            done.textContent = "Completed";

            item.appendChild(done);
            $("completed").appendChild(item);
        }
    });

    $("countPending").textContent = pendingCount;
    $("countDone").textContent = doneCount;
    $("nextDate").textContent = next || "--";
}

render();