import { useState } from "react";
import { createGenre } from "../../../_services/genres";
import { useNavigate } from "react-router-dom";

export default function CreateGenre() {
  const [name, setName] = useState("");
  const navigate = useNavigate();

  const onSubmit = async (e) => {
    e.preventDefault();
    await createGenre({ name });
    navigate("/admin/genres");
  };

  return (
    <div>
      <h1 className="text-xl font-bold mb-4">Create Genre</h1>

      <form onSubmit={onSubmit}>
        <input
          type="text"
          value={name}
          placeholder="Genre name"
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
