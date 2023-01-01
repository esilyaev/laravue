import { defineStore } from "pinia";
import axios from "../lib/axios";

export const useIssueStore = defineStore('issues', {
  state: () => ({
    isLoading: false,
    issues: []
  }),
  actions: {
    async fetchIssues() {
      this.isLoading = true
      const res = await axios.get('api/issue')
      this.issues = [...res.data]
      this.isLoading = false
    }
  }
})