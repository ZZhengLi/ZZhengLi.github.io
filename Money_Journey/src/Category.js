import { useState, useEffect } from 'react'
import { Button, Modal } from 'react-bootstrap'
import Container from 'react-bootstrap/Container'
import Table from 'react-bootstrap/Table'
import Row from 'react-bootstrap/Row'
import Col from 'react-bootstrap/Col'
import { BsPlus, BsTrash, BsPencil } from "react-icons/bs";
import { useForm } from "react-hook-form"

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
const auth = firebase.auth()

export default function Category() {
  const { register, handleSubmit } = useForm()
  const [showForm, setShowForm] = useState(false)
  const [records, setRecords] = useState([])
  const [editMode, setEditMode] = useState(false)
  const [tempData, setTempData] = useState({
    num: null,
    name: ''
  })

  // Firebase stuff
  const categoryRef = firestore.collection('category');
  const query = categoryRef.orderBy('num', 'asc').limitToLast(100);
  const [data] = useCollectionData(query, { idField: 'id' });


  console.log("REACT_APP_PROJECT_ID", process.env.REACT_APP_PROJECT_ID)

  // This will be run when 'data' is changed.
  useEffect(() => {
    if (data) { // Guard condition
      let r = data.map((d, i) => {
        return (
          <CategoryRow
            data={d}
            i={i}
            onDeleteClick={handleDeleteClick}
            onEditClick={handleEditClick}
          />
        )
      })

      setRecords(r)
    }
  },
    [data])

  // Handlers for Modal Add Form
  const handleshowForm = () => setShowForm(true)

  // Handlers for Modal Add Form
  const handleCloseForm = () => {
    setTempData({
      num: null,
      name: ''
    })
    setShowForm(false)
    setEditMode(false)
  }

  // Handle Add Form submit
  const onSubmit = async (data) => {
    let preparedData = {
      // ...data,
      num: parseFloat(data.num),
      name: data.name
    }
    console.log('onSubmit', preparedData)


    if (editMode) {
      // Update record
      console.log("UPDATING!!!!", data.id)
      await categoryRef.doc(data.id)
        .set(preparedData)
        .then(() => console.log("categoryRef has been set"))
        .catch((error) => {
          console.error("Error: ", error);
          alert(error)
        });
    } else {
      // Add to firebase
      // This is asynchronous operation, 
      // JS will continue process later, so we can set "callback" function
      // so the callback functions will be called when firebase finishes.
      // Usually, the function is called "then / error / catch".
      await categoryRef
        .add(preparedData)
        .then(() => console.log("New record has been added."))
        .catch((error) => {
          console.error("Errror:", error)
          alert(error)
        })
      // setShowForm(false)
    }
    handleCloseForm()
  }

  const handleDeleteClick = (id) => {
    console.log('handleDeleteClick in Category', id)
    if (window.confirm("Are you sure to delete this record?"))
      categoryRef.doc(id).delete()
  }

  const handleEditClick = (data) => {
    let preparedData = {
      num: parseFloat(data.num),
      name: data.name
    }
    console.log("handleEditClick", preparedData)
    // expect original data type for data.createdAt is Firebase's timestamp
    // convert to JS Date object and put it to the same field
    // if ('toDate' in data.createdAt) // guard, check wther toDate() is available in createdAt object.
    //   data.createdAt = data.createdAt.toDate()

    setTempData(preparedData)
    setShowForm(true)
    setEditMode(true)
  }


  return (
    <Container>
      <Row>
        <Col>
          <h1 align="center">Category</h1>
          <Button variant="outline-dark" onClick={handleshowForm}>
            <BsPlus /> Add
      </Button>
        </Col>
      </Row>

      <Table striped bordered hover variant="dark">
        <thead>
          <tr>
            <th>id</th>
            <th>category</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          {records}
        </tbody>
      </Table>

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
              {editMode ? "Edit Category" : "Add New Category"}
            </Modal.Title>
          </Modal.Header>
          <Modal.Body>
            <Row>
              <Col>
                <label htmlFor="num">id</label>
              </Col>
              <Col>
                <input
                  type="number"
                  step="any"
                  min="0"
                  placeholder="id"
                  ref={register({ required: true })}
                  name="num"
                  id="num"
                  defaultValue={tempData.num}
                />
              </Col>
            </Row>
            <Row>
              <Col>
                <label htmlFor="name">category</label>
              </Col>
              <Col>
                <input
                  type="text"
                  placeholder="category"
                  ref={register({ required: true })}
                  name="name"
                  id="name"
                  defaultValue={tempData.name}
                />
              </Col>
            </Row>
          </Modal.Body>
          <Modal.Footer>
            <Button variant="secondary" onClick={handleCloseForm}>
              Close
          </Button>
            <Button variant={editMode ? "success" : "primary"} type="submit">
              {editMode ? "Save Category" : "Add Category"}
            </Button>
          </Modal.Footer>
        </form>
      </Modal>
    </Container>
  )
}

function CategoryRow(props) {
  let d = props.data
  let i = props.i
  return (
    <tr>
      <td>{d.num}</td>
      <td>{d.name}</td>
      <td>
        <BsTrash onClick={() => props.onDeleteClick(d.id)} />
      </td>
    </tr>
  )
}