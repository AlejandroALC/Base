// lib/js/submitForm.js
export async function submitForm(url, formEvent) {
    const formData = new FormData(formEvent.target);
    
    const response = await fetch(url, {
        method: 'POST',
        body: formData,
        headers: {
            'Accept': 'application/json'
        }
    });
    
    if (!response.ok) {
        throw new Error(`Error HTTP: ${response.status}`);
    }
    
    return await response.json();
}
