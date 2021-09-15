import React, { useState, useEffect } from 'react'

function Test() {

    const [members, setMembers] = useState([])
    const [loading, setLoading] = useState(true)

    useEffect(() => {
        fetch(`${adminLocalizer.apiUrl}/twdbmg/v1/members`)
            .then(response => response.json())
            .then(data => {
                setMembers(data.results)
                setLoading(false)
            })
    }, [members])

    return (
        <div className="twinwebdev-board-members-instructions">
            <h1>Board Members</h1>
            <ul><h2>Current Board Members</h2>
                { loading === false ? members.map(member => <li key={member.id}>{member.name}</li>) : <p>Loading</p>}
            </ul>
            <h2>Instructions</h2>
            <p>Go to the "Board Members" menu to add a new board member.  Enter a name and a role for each board member.  Set the featured image as the photo to be displayed for the member.  The photo should be 345px wide by 440px high.</p>
            <p>To add a Boad Members Gallery to a page or post, use this shortcode: </p>
            <p><code>[board-members-gallery]</code></p>
            <p>This will create a gallery using the Featured Image and title of all published Board Members.  The members will be displayed in the order they were created.</p>
        </div>
    )
}

export default Test