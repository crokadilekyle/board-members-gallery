import React, { useState, useEffect } from 'react'

function Members() {
    const [members, setMembers] = useState([])
    const [loading, setLoading] = useState(true)

    useEffect(() => {
        fetch(`${adminLocalizer.apiUrl}/twdbmg/v1/members`)
            .then(response => response.json())
            .then(data => {
                setMembers(data)
                setLoading(false)
            })
    }, [members])

    return (
        <div className="twinwebdev-board-members-instructions">
            <h1>Board Members</h1>
            <h2>Current Board Members</h2>
            <table>
                <tr>
                    <th>Board Member</th>
                    <th>Role</th>
                </tr>
                    {loading === false ? members.map(member => <tr key={member.id}><td>{member.name}</td><td>{member.role}</td></tr>) : <p>Loading</p>}    
            </table>
        </div>
    )
}

export default Members
