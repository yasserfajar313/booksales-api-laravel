import API from "../_api";

// GET all books
export const getBooks = async () => {
  const { data } = await API.get("/books");
  return data;
};

// CREATE new book
export const createBook = async (payload) => {
  try {
    const { data } = await API.post("/books", payload);
    return data;
  } catch (error) {
    console.error("Create book error:", error);
    throw error;
  }
};
