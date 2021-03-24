import { useState } from 'react'
import { Button, Modal } from 'react-bootstrap'
import Container from 'react-bootstrap/Container'
import Row from 'react-bootstrap/Row'
import Col from 'react-bootstrap/Col'
import { format } from 'date-fns'
import { BsPlus } from "react-icons/bs";
import { useForm } from "react-hook-form"

// Firebase
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

export default function Request() {
  const { register, handleSubmit } = useForm()
  const [showForm, setShowForm] = useState(false)
  const [tempData, setTempData] = useState({
    Name: null,
    Phone_number: null,
    Arrival_time: null,
    Departure_time: null,
    Reason: null,
    createdAt: new Date(),
  })

  // Firebase stuff
  const requestRef = firestore.collection('request');

  console.log("REACT_APP_PROJECT_ID", process.env.REACT_APP_PROJECT_ID)

  // Handlers for Modal Add Form
  const handleshowForm = () => {
    setShowForm(true)
  }

  // Handlers for Modal Add Form
  const handleCloseForm = () => {
    setTempData({
      Name: "",
      Phone_number: "",
      Arrival_time: "",
      Departure_time: "",
      Reason: "",
      createdAt: new Date(),
    })
    setShowForm(false)
  }

  // Handle Add Form submit
  const onSubmit = async (data) => {
    let preparedData = {
      // ...data,
      Name: data.Name,
      Phone_number: data.Phone_number,
      Arrival_time: data.Arrival_time,
      Departure_time: data.Departure_time,
      Reason: data.Reason,
      createdAt: new Date()
    }
    console.log('onSubmit', preparedData)
    // Add to firebase
    // This is asynchronous operation, 
    // JS will continue process later, so we can set "callback" function
    // so the callback functions will be called when firebase finishes.
    // Usually, the function is called "then / error / catch".
    await requestRef
      .add(preparedData)
      .then(() => console.log("New record has been added."))
      .catch((error) => {
        console.error("Errror:", error)
        alert(error)
      })
    // setShowForm(false)

    handleCloseForm()
  }

  return (
    <Container>
      <Row>
        <Col>
          <h1 align="center">Request</h1>
        </Col>
      </Row>

      <Row>
        <Col>
          <p align="center">Click the button and enter the required information to submit your request</p>
        </Col>
      </Row>

      <Row>
        <Col align="center">
          <Button variant="outline-dark" onClick={handleshowForm}>
            <BsPlus /> Request
      </Button>
        </Col>
      </Row>

      <Modal
        show={showForm} onHide={handleCloseForm}
        aria-labelledby="contained-modal-title-vcenter"
        centered
      >
        <form onSubmit={handleSubmit(onSubmit)}>
          <input
            type="hidden"
            placeholder="ID"
            ref={register({ required: false })}
            name="id"
            id="id"
            defaultValue={tempData.id}
          />
          <Modal.Header closeButton>
            <Modal.Title>
              Add New Request
            </Modal.Title>
          </Modal.Header>
          <Modal.Body>
            <Row>
              <Col>
                <label htmlFor="createdAt" hidden>Date</label>
              </Col>
              <Col>
                <input
                  type="date"
                  placeholder="Date"
                  value={format(tempData.createdAt, "yyyy-MM-dd")}
                  ref={register({ required: true })}
                  name="createdAt"
                  id="createdAt"
                  defaultValue={format(tempData.createdAt, "yyyy-MM-dd")}
                  hidden />

              </Col>
            </Row>

            <Row>
              <Col>
                <label htmlFor="Name">Name</label>
              </Col>
              <Col>
                <input
                  type="text"
                  placeholder="Name"
                  ref={register({ required: true })}
                  name="Name"
                  id="Name"
                  defaultValue={tempData.Name}
                />
              </Col>
            </Row>

            <Row>
              <Col>
                <label htmlFor="Phone_number">Phone_number</label>
              </Col>
              <Col>
                <input
                  type="text"
                  placeholder="Phone_number"
                  ref={register({ required: true })}
                  name="Phone_number"
                  id="Phone_number"
                  defaultValue={tempData.Phone_number}
                />
              </Col>
            </Row>
            <Row>
              <Col>
                <label htmlFor="Arrival_time">Arrival_time</label>
              </Col>
              <Col>
                <input
                  type="text"
                  placeholder="Arrival_time"
                  ref={register({ required: true })}
                  name="Arrival_time"
                  id="Arrival_time"
                  defaultValue={tempData.Arrival_time}
                />
              </Col>
            </Row>
            <Row>
              <Col>
                <label htmlFor="Departure_time">Departure_time</label>
              </Col>
              <Col>
                <input
                  type="text"
                  placeholder="Departure_time"
                  ref={register({ required: true })}
                  name="Departure_time"
                  id="Departure_time"
                  defaultValue={tempData.Departure_time}
                />
              </Col>
            </Row>
            <Row>
              <Col>
                <label htmlFor="Reason">Reason</label>
              </Col>
              <Col>
                <input
                  type="text"
                  placeholder="Reason"
                  ref={register({ required: true })}
                  name="Reason"
                  id="Reason"
                  defaultValue={tempData.Reason}
                />
              </Col>
            </Row>
          </Modal.Body>
          <Modal.Footer>
            <Button variant="secondary" onClick={handleCloseForm}>
              Close
          </Button>
            <Button variant="primary" type="submit">
              "Add Request"
            </Button>
          </Modal.Footer>
        </form>
      </Modal>
    </Container>
  )
}