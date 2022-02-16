import React  from 'react';
import axios from 'axios';
import { useState } from "react";


export default function Add () {
    const [inputs, setInputs] = useState({descriptor: "", quantity: 1});
    const handleChange = (event) => {
        const name = event.target.name;
        const value = event.target.value;
        setInputs( values => ({...values, [name]: value}) );
    }

    const [responseMessage, setResponseMessage] = useState("");
    const [responded, setResponded] = useState(false);

    async function addItem() {
        const response = await axios.post("http://localhost:8000/api/items/", {descriptor: inputs.descriptor, quantity: inputs.quantity} );
        return response.data;
    }
    const handleSubmit = (event) => {
        event.preventDefault();
        addItem().then((data) => {
            if(data === 201)
                setResponseMessage("item added!");
            setResponded(true);
        })
        .catch((err) => console.log(err));
    }

    const Response = () => {
        if(!responded)
            return <div></div>;
        return <div style={{ marginTop: '15px'}}>{responseMessage}</div>
    }

    return (
        <div class="container" style={{ marginLeft: '44%'}}>
            <form onSubmit={handleSubmit}>
                <h1>Add new inventory item:</h1>
                <label>Description: <input type="text" value={inputs.descriptor || ""} name="descriptor" onChange={handleChange} required/></label>
                <br/><label>Quantity: <input type="number" value={inputs.quantity || ""} name="quantity" onChange={handleChange} required/></label>
                <br/><input type="submit"/>
            </form>
            <Response/>
        </div>
    );
}

