// Function to fetch complaint data dynamically (simulated API call)
function fetchComplaintData() {
    // Simulate fetching data (replace with actual fetch if using an API)
    return new Promise((resolve) => {
        setTimeout(() => {
            const complaintData = {
                case_number: 1732581892,
                case_created: "2024-11-26T01:44:52+01:00",
                case_description: "Nakita sa daan",
                case_status: "Ongoing",
                case_complainants: [{ name: "Lyca", address: "Sitio 1" }],
                case_respondents: [{ name: "Christian", address: "Sitio 2" }]
            };
            resolve(complaintData);
        }, 500); // Simulating a network delay
    });
}

// Function to format date to 12-hour format (Asia/Taipei)
function formatDateTo12Hour(dateString) {
    const date = new Date(dateString);
    const options = {
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit',
        hour12: true,
        timeZone: 'Asia/Taipei'
    };
    return date.toLocaleTimeString('en-US', options);
}

// Function to format complaint data into an email-friendly format
function generateEmailBody(complaint) {
    const caseCreated = new Date(complaint.case_created);
    const formattedDate = caseCreated.toLocaleString('en-US', { timeZone: 'Asia/Taipei' });
    const incidentTime = formatDateTo12Hour(complaint.case_created);

    let body = `Forwarded Case From BCPC of Brgy. Sta Lucia\n\n`;
    body += `Case Number: ${complaint.case_number}\n`;
    body += `Incident Case Time: ${incidentTime}\n`;
    body += `Case Created: ${formattedDate}\n`;
    body += `Case Description: ${complaint.case_description}\n\n`;
    
    body += `Case Status: ${complaint.case_status}\n\n`;

    body += `Case Complainants:\n`;
    complaint.case_complainants.forEach(c => {
        body += `- ${c.name}, ${c.address}\n`;
    });

    body += `\nCase Respondents:\n`;
    complaint.case_respondents.forEach(r => {
        body += `- ${r.name}, ${r.address}\n`;
    });

    return encodeURIComponent(body); // Encoding the body to be used in the email URL
}

// Function to handle "Proceed" button click for sending email
function sendEmail(agency, complaint) {
    const emailBody = generateEmailBody(complaint); // Get the complaint details formatted as email body
    
    let emailLink = '';
    
    // Determine which email link to use based on selected agency
    if (agency === 'DSWD') {
        emailLink = `https://mail.google.com/mail/?view=cm&fs=1&to=inquiry@dswd.gov.ph&body=${emailBody}`;
    } else if (agency === 'PNP') {
        emailLink = `https://mail.google.com/mail/?view=cm&fs=1&to=pdea_cs@yahoo.com.ph,dc@pnp.gov.ph&body=${emailBody}`;
    } else if (agency === 'DILG') {
        emailLink = `https://mail.google.com/mail/?view=cm&fs=1&to=pdea_cs@yahoo.com.ph,dc@pnp.gov.ph,jcremulla@dilg.gov.ph&body=${emailBody}`;
    }
    
    // Open the Gmail compose window with pre-filled email content
    window.open(emailLink, '_blank');
}

document.getElementById('sendToDSWD').addEventListener('click', () => {
    fetchComplaintData().then(complaint => {
        sendEmail('DSWD', complaint); // Send email to PDEA
    });
});
// Add event listeners to buttons in the modal
document.getElementById('sendToPDEA').addEventListener('click', () => {
    fetchComplaintData().then(complaint => {
        sendEmail('PDEA', complaint); // Send email to PDEA
    });
});
document.getElementById('sendToPNP').addEventListener('click', () => {
    fetchComplaintData().then(complaint => {
        sendEmail('PNP', complaint); // Send email to PNP
    });
});
document.getElementById('sendToDILG').addEventListener('click', () => {
    fetchComplaintData().then(complaint => {
        sendEmail('DILG', complaint); // Send email to DILG
    });
});