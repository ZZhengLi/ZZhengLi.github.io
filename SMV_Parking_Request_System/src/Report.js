import { useState, useEffect } from 'react'
import Container from 'react-bootstrap/Container'
import Table from 'react-bootstrap/Table'
import Row from 'react-bootstrap/Row'
import Col from 'react-bootstrap/Col'
import { BsTrash } from "react-icons/bs";
import { format } from 'date-fns'

// Firebase
import { useCollectionData } from 'react-firebase-hooks/firestore';
import firebase from 'firebase/app'
import 'firebase/firestore'
import 'firebase/auth'

if (firebase.apps.length === 0) {
  firebase.initializeApp({
    apiKey: process.env.REACT_APP_API_KEY,
    authDomain: process.env.REACT_APP_AUTH_DOMAIN,
    databaseUrl: process.env.REACT_APP_DATABASE_URL,
    projectId: process.env.REACT_APP_PROJECT_ID,
    storageBucket: process.env.REACT_APP_STORAGE_BUCKET,
    messagingSenderId: process.env.REACT_APP_MESSAGING_SENDER_ID,
    appId: process.env.REACT_APP_APP_ID
  })
}
const firestore = firebase.firestore()

export default function Report() {
  const [records, setRecords] = useState([])

  // Firebase stuff
  const requestRef = firestore.collection('request');
  const query = requestRef.orderBy('createdAt', 'asc').limitToLast(100);
  const [data] = useCollectionData(query, { idField: 'id' });

  console.log("REACT_APP_PROJECT_ID", process.env.REACT_APP_PROJECT_ID)

  // This will be run when 'data' is changed.
  useEffect(() => {
    if (data) { // Guard condition
      let r = data.map((d, i) => {
        return (
          <RequestRow
            data={d}
            i={i}
            onDeleteClick={handleDeleteClick}
          />
        )
      })
      setRecords(r)
    }
  },
    [data])

  const handleDeleteClick = (id) => {
    console.log('handleDeleteClick in Category', id)
    if (window.confirm("Are you sure to delete this record?"))
      requestRef.doc(id).delete()
  }

  return (
    <Container>
      <Row>
        <Col>
          <h1 align="center">Report</h1>
        </Col>
      </Row>

      <Table striped bordered hover variant="dark">
        <thead>
          <tr>
            <th>createdAt</th>
            <th>Name</th>
            <th>Phone_number</th>
            <th>Arrival_time</th>
            <th>Departure_time</th>
            <th>Reason</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          {records}
        </tbody>
      </Table>

    </Container>
  )
}

function RequestRow(props) {
  let d = props.data
  let i = props.i
  return (
    <tr>
      <td>{format(d.createdAt.toDate(), "yyyy-MM-dd")}</td>
      <td>{d.Name}</td>
      <td>{d.Phone_number}</td>
      <td>{d.Arrival_time}</td>
      <td>{d.Departure_time}</td>
      <td>{d.Reason}</td>
      <td>
        <BsTrash onClick={() => props.onDeleteClick(d.id)} />
      </td>
    </tr>
  )
}