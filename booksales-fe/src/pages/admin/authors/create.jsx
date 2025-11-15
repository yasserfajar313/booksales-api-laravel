import { useState } from "react";
import { createAuthor } from "../../../_services/authors";
import { useNavigate } from "react-router-dom";

export default function CreateAuthor() {
  const [name, setName] = useState("");
  const navigate = useNavigate();

  const onSubmit = async (e) => {
    e.preventDefault();
    await createAuthor({ name });
    navigate("/admin/authors");
  };

  return (
    <div>
      <h1 className="text-xl font-bold mb-4">Create Author</h1>

      <form onSubmit={onSubmit}>
        <input
          type="text"
          placeholder="Author name"
          value={name}
          onChange={(e) => setName(e.target.value)}
          className="border p-2 rounded w-full"
        />

        <button
          type="submit"
          className="mt-4 bg-green-600 text-white px-4 py-2 rounded"
        >
          Save
        </button>
      </form>
    </div>
  );
}
